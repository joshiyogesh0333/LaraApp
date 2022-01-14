<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use App\Helpers\Helper;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert(['name' => 'BOQRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'BOQCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'BOQUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'BOQDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'CustomerRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'CustomerCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'CustomerUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'CustomerDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'UserRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'UserCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'UserUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'UserDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'RoleRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'RoleCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'RoleUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'RoleDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'PermissionRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'PermissionCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'PermissionUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'PermissionDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'MasterRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'MasterCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'MasterUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'MasterDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'SitelocationRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'SitelocationCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'SitelocationUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'SitelocationDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'VendorRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'VendorCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'VendorUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'VendorDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'LabourRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'LabourCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'LabourUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'LabourDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'EmployeeRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'EmployeeCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'EmployeeUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'EmployeeDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'ExpenseRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'ExpenseCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'ExpenseUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'ExpenseDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'DebitcardRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'DebitcardCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'DebitcardUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'DebitcardDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'DebitcardAllotmentRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'DebitcardAllotmentCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'DebitcardAllotmentUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'DebitcardAllotmentDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'PurchaseOrderRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'PurchaseOrderCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'PurchaseOrderUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'PurchaseOrderDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'InvoiceAcknowledgeRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'InvoiceAcknowledgeCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'InvoiceAcknowledgeUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'InvoiceAcknowledgeDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'InvoiceRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'InvoiceCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'InvoiceUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'InvoiceDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'VoucherRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'VoucherCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'VoucherUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'VoucherDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'BankRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'BankCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'BankUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'BankDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'InvoiceValidationRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'InvoiceValidationCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'InvoiceValidationUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'InvoiceValidationDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'InvoiceApprovalRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'InvoiceApprovalCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'InvoiceApprovalUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'InvoiceApprovalDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'PaymentRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'PaymentCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'PaymentUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'PaymentDelete','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'SiteBudgetRead','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'SiteBudgetCreate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'SiteBudgetUpdate','guard_name' => 'web']);
        DB::table('permissions')->insert(['name' => 'SiteBudgetDelete','guard_name' => 'web']);
        
    }
}
