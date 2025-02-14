<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cst_customer extends Model
{
    use HasFactory;
    protected $table = 'cst_customers'; // Nama tabel di database
    protected $primaryKey = 'cst_id'; // Primary Key
    public $timestamps = true; // Auto timestamps (created_at & updated_at)

    protected $fillable = [
        'cst_id',
        'cst_name',
        'cst_address',
        'cst_email',
        'cst_phone',
        'cst_sts_custom_input',
        'cst_file_custom_input',
        'cst_sts_custom_certificate',
        'cst_file_custom_certificate',
        'cst_file_custom_certificate_scd',

    ]; // Kolom yang boleh diisi
}
