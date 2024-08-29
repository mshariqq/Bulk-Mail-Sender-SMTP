<?php

namespace App\Imports;

use App\Models\EmailList;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class EmailListImport implements ToModel
{
    use Importable;

    public function model(array $row)
    {
        // Ensure the row has the expected number of columns
        if (count($row) < 1) {
            return null; // Skip empty rows
        }

        // Skip rows with empty email values
        if (empty($row['email'])) {
            return null;
        }

        return new EmailList([
            'email'        => $row[0],
            'company_name' => $row[1] ?? null,
            'person_name'  => $row[2] ?? null,
            'country'      => $row[3] ?? null,
            'city'         => $row[4] ?? null,
            'list_name'    => $row[5] ?? null,
        ]);
    }
}
