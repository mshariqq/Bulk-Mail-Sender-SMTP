<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailList;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;

class EmailListController extends Controller
{
    public function index()
    {
        $emailLists = EmailList::paginate(49);
        return view('email_list.index', compact('emailLists'));
    }

    public function destroy($id)
    {
        $emailList = EmailList::findOrFail($id);
        $emailList->delete();

        return redirect()->route('email_list.index')->with('success', 'Record deleted successfully.');
    }

    public function deleteMultiple(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:email_list,id',
        ]);

        EmailList::whereIn('id', $request->ids)->delete();

        return redirect()->route('email_list.index')->with('success', 'Selected records deleted successfully.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048',
        ]);
    
        try {
            // Handle the file import using Maatwebsite Excel
            Excel::import(new EmailListImport, $request->file('csv_file'));
    
            return redirect()->route('email_list.index')->with('success', 'CSV file imported successfully.');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            // Handle validation errors
            $failures = $e->failures();
            $errorMessages = [];
    
            foreach ($failures as $failure) {
                $errorMessages[] = "Row {$failure->row()}: {$failure->errors()[0]}";
            }
    
            return redirect()->route('email_list.index')->with('error', implode(', ', $errorMessages));
        } catch (\Exception $e) {
            return redirect()->route('email_list.index')->with('error', $e->getMessage());
        }
    }
    
}

class EmailListImport implements ToModel
{
    public function model(array $row)
    {
        return new EmailList([
            'email'        => $row[0],
            'company_name' => $row[1] ?? null,
            'person_name'  => $row[2] ?? null,
            'country'      => $row[3] ?? null,
            'city'         => $row[4] ?? null,
            'list_name'         => $row[5] ?? null,
        ]);
    }
}
