<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;
use Mail;
use App\Mail\MailNotify;

class DatabaseController extends Controller
{
    // Constants to avoid string duplication
    private const SUCCESS_MESSAGE = 'Operation Successful.';
    private const NO_CHANGES_MESSAGE = 'No changes made.';
    private const DELETION_SUCCESS_MESSAGE = 'Deletion is Successful.';

    public function AddLeaveType(Request $request)
    {
        if ($this->isAdmin()) {
            $this->validate($request, [
                'ltype' => 'required',
                'lcount' => 'required',
                'lfrom' => 'required',
                'lto' => 'required',
            ]);

            $leaveTypeData = [
                'ltype' => $request->ltype,
                'lcount' => $request->lcount,
                'lfrom' => $request->lfrom,
                'lto' => $request->lto,
            ];

            if (DB::table('leave_type')->where('leave_type_name', $leaveTypeData['ltype'])->doesntExist()) {
                DB::table('leave_type')->insert([
                    'leave_type_name' => $leaveTypeData['ltype'],
                    'count' => $leaveTypeData['lcount'],
                    'from_date' => $leaveTypeData['lfrom'],
                    'to_date' => $leaveTypeData['lto'],
                    'active' => 1,
                ]);
                return redirect()->back()->with('message', self::SUCCESS_MESSAGE);
            }

            return redirect()->back()->withErrors("The given leave type already exists in the database.");
        }

        return view("login-page");
    }

    public function InsertStaffData(Request $request)
    {
        if ($this->isAdmin()) {
            $this->validate($request, [
                'staff_id' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'date_of_birth' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
                'position' => 'required',
            ]);

            $staffData = [
                'staff_id' => $request->staff_id,
                'firstname' => $request->first_name,
                'lastname' => $request->last_name,
                'dob' => $request->date_of_birth,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'position' => $request->position,
            ];

            if (DB::table('staff_data')->where('staff_id', $staffData['staff_id'])->doesntExist()) {
                DB::table('staff_data')->insert($staffData);
                return redirect()->back()->with('message', 'Registration is Successful.');
            }

            return redirect()->back()->withErrors("The given staff ID already exists in the database.");
        }

        return view("login-page");
    }

    public function DeleteStaffData($auto_id)
    {
        if ($this->isAdmin()) {
            DB::table('staff_data')->where('auto_id', '=', $auto_id)->delete();
            return redirect()->back()->with('message', self::DELETION_SUCCESS_MESSAGE);
        }

        return Redirect::to("/");
    }

    public function UpdateStaffData(Request $request)
    {
        if ($this->isAdmin()) {
            $this->validate($request, [
                'auto_id' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'date_of_birth' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
                'position' => 'required',
            ]);

            $staffData = [
                'firstname' => $request->first_name,
                'lastname' => $request->last_name,
                'dob' => $request->date_of_birth,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'position' => $request->position,
            ];

            $updated = DB::table('staff_data')->where('auto_id', $request->auto_id)->update($staffData);
            $message = $updated ? self::SUCCESS_MESSAGE : self::NO_CHANGES_MESSAGE;

            return Redirect::to("/view-staff-management-index")->with('message', $message);
        }

        return Redirect::to("/");
    }

    public function ChangeUsername(Request $request)
    {
        if ($this->isAdmin()) {
            $adminData = $this->getAdminData();
            if ($request->password == $adminData->password) {
                $updated = DB::table('user_account')->where('account_type', 'admin')->update(['username' => $request->username]);
                $message = $updated ? 'Username has been updated successfully.' : self::NO_CHANGES_MESSAGE;

                return redirect()->back()->with('message', $message);
            }

            return redirect()->back()->withErrors('The password is wrong.');
        }

        return Redirect::to("/");
    }

    public function ChangePassword(Request $request)
    {
        if ($this->isAdmin()) {
            $adminData = $this->getAdminData();
            if ($request->current_password == $adminData->password) {
                if ($request->new_password == $request->confirm_password) {
                    $updated = DB::table('user_account')->where('account_type', 'admin')->update(['password' => $request->new_password]);
                    $message = $updated ? 'Password has been updated successfully.' : self::NO_CHANGES_MESSAGE;

                    return redirect()->back()->with('message', $message);
                }

                return redirect()->back()->withErrors('The confirm password does not match.');
            }

            return redirect()->back()->withErrors('The current password is wrong.');
        }

        return Redirect::to("/");
    }

    private function isAdmin(): bool
    {
        return Session::get('Session_Type') === "Admin";
    }

    private function getAdminData()
    {
        return DB::table('user_account')->where("account_type", "admin")->first();
    }
}