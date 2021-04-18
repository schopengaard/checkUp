<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Authentication Routes...
Route::prefix('patient')->group(function() {
	Route::get('login', 'Auth\PatientLoginController@showLoginForm')->name('patient.login');
	Route::post('login', 'Auth\PatientLoginController@login')->name('patient.login.submit');
	Route::get('/', 'PatientController@index')->name('patient.dashboard');

	Route::get('edit_patient/{id}', 'PatientController@edit_patient')->name('patient.edit_patient');
	Route::patch('edit_patient/{id}', 'PatientController@update_patient')->name('patient.update_patient');

	Route::get('create_appointment', 'PatientController@create_appointment')->name('patient.create_appointment');
	Route::post('create_appointment', 'PatientController@store_appointment')->name('patient.create_appointment.submit');

	Route::get('edit_appointment/{id}', 'PatientController@edit_appointment')->name('patient.edit_appointment');
	Route::patch('edit_appointment/{id}', 'PatientController@update_appointment')->name('patient.update_appointment');

	Route::get('appointment_page', 'PatientController@appointment_page')->name('patient.appointment_page');
	Route::get('doctor_page', 'PatientController@doctor_page')->name('patient.doctor_page');
	Route::get('medicine_reminder_page', 'PatientController@medicine_reminder_page')->name('patient.medicine_reminder_page');
	Route::get('medical_history_page', 'PatientController@medical_history_page')->name('patient.medical_history_page');

	Route::get('show_appointment/{id}', 'PatientController@show_appointment')->name('patient.show_appointment');
	Route::get('show_doctor/{id}', 'PatientController@show_doctor')->name('patient.show_doctor');
	Route::get('show_medicine_reminder/{id}', 'PatientController@show_medicine_reminder')->name('patient.show_medicine_reminder');
	Route::get('show_medical_history/{id}', 'PatientController@show_medical_history')->name('patient.show_medical_history');

	Route::get('search_appointment', 'PatientController@search_appointment')->name('patient.search_appointment');
	Route::get('search_doctor', 'PatientController@search_doctor')->name('patient.search_doctor');
	Route::get('search_medicine_reminder', 'PatientController@search_medicine_reminder')->name('patient.search_medicine_reminder');
	Route::get('search_medical_history', 'PatientController@search_medical_history')->name('patient.search_medical_history');

	Route::delete('delete_appointment/{id}', 'PatientController@destroy_appointment')->name('patient.delete_appointment');
});

Route::prefix('doctor')->group(function() {
	Route::get('login', 'Auth\DoctorLoginController@showLoginForm')->name('doctor.login');
	Route::post('login', 'Auth\DoctorLoginController@login')->name('doctor.login.submit');
	Route::get('/', 'DoctorController@index')->name('doctor.dashboard');

	Route::get('edit_doctor/{id}', 'DoctorController@edit_doctor')->name('doctor.edit_doctor');
	Route::patch('edit_doctor/{id}', 'DoctorController@update_doctor')->name('doctor.update_doctor');

	Route::get('schedule_page', 'DoctorController@schedule_page')->name('doctor.schedule_page');
	Route::get('history_page', 'DoctorController@history_page')->name('doctor.history_page');
	Route::get('patient_page', 'DoctorController@patient_page')->name('doctor.patient_page');

	Route::get('future_appointment_page', 'DoctorController@future_appointment_page')->name('doctor.future_appointment_page');
	Route::get('past_appointment_page', 'DoctorController@past_appointment_page')->name('doctor.past_appointment_page');
	Route::get('create_appointment', 'DoctorController@create_appointment')->name('doctor.create_appointment');
	Route::post('create_appointment', 'DoctorController@store_appointment')->name('doctor.create_appointment.submit');

	Route::get('edit_schedule', 'DoctorController@edit_schedule')->name('doctor.edit_schedule');
	Route::post('edit_schedule', 'DoctorController@update_schedule')->name('doctor.edit_schedule.submit');

	Route::get('search_appointment', 'DoctorController@search_appointment')->name('doctor.search_appointment');
	Route::get('edit_appointment/{id}', 'DoctorController@edit_appointment')->name('doctor.edit_appointment');
	Route::patch('edit_appointment/{id}', 'DoctorController@update_appointment')->name('doctor.update_appointment');
	Route::delete('delete_appointment/{id}', 'DoctorController@destroy_appointment')->name('doctor.delete_appointment');

	Route::get('search_schedule', 'DoctorController@search_schedule')->name('doctor.search_schedule');
	Route::get('edit_schedule/{id}', 'DoctorController@edit_schedule')->name('doctor.edit_schedule');
	Route::patch('edit_schedule/{id}', 'DoctorController@update_schedule')->name('doctor.update_schedule');

	Route::get('search_patient', 'DoctorController@search_patient')->name('doctor.search_patient');

	Route::get('show_appointment/{id}', 'DoctorController@show_appointment')->name('doctor.show_appointment');
	Route::get('show_patient/{id}', 'DoctorController@show_patient')->name('doctor.show_patient');
	Route::get('show_schedule/{id}', 'DoctorController@show_schedule')->name('doctor.show_schedule');
	Route::get('show_future_appointment/{id}', 'DoctorController@show_future_appointment')->name('doctor.show_future_appointment');
	Route::get('show_past_appointment/{id}', 'DoctorController@show_past_appointment')->name('doctor.show_past_appointment');

	Route::delete('delete_schedule/{id}', 'DoctorController@destroy_schedule')->name('doctor.delete_schedule');
});

Route::prefix('admin')->group(function() {
	Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');

	Route::get('patient_page', 'AdminController@patient_page')->name('admin.patient_page');
	Route::get('doctor_page', 'AdminController@doctor_page')->name('admin.doctor_page');
	Route::get('future_appointment_page', 'AdminController@future_appointment_page')->name('admin.future_appointment_page');
	Route::get('past_appointment_page', 'AdminController@past_appointment_page')->name('admin.past_appointment_page');
	Route::get('bill_page', 'AdminController@bill_page')->name('admin.bill_page');
	Route::get('medicine_page', 'AdminController@medicine_page')->name('admin.medicine_page');

	Route::get('edit_admin/{id}', 'AdminController@edit_admin')->name('doctor.edit_admin');
	Route::patch('edit_admin/{id}', 'AdminController@update_admin')->name('doctor.update_admin');

	Route::get('create_patient', 'AdminController@create_patient')->name('admin.create_patient');
	Route::post('create_patient', 'AdminController@store_patient')->name('admin.create_patient.submit');

	Route::get('create_doctor', 'AdminController@create_doctor')->name('admin.create_patient');
	Route::post('create_doctor', 'AdminController@store_doctor')->name('admin.create_doctor.submit');

	Route::get('create_appointment/action', 'AdminController@ajaxSearchPatient')->name('admin.create_appointment.action');
	Route::get('create_appointment', 'AdminController@create_appointment')->name('admin.create_appointment');
	Route::post('create_appointment', 'AdminController@store_appointment')->name('admin.create_appointment.submit');

	Route::get('create_bill', 'AdminController@create_bill')->name('admin.create_bill');
	Route::post('create_bill', 'AdminController@store_bill')->name('admin.create_bill.submit');

	Route::get('create_medicine', 'AdminController@create_medicine')->name('admin.create_medicine');
	Route::post('create_medicine', 'AdminController@store_medicine')->name('admin.create_medicine.submit');

	Route::get('search_future_appointment', 'AdminController@search_future_appointment')->name('admin.search_future_appointment');
	Route::get('search_past_appointment', 'AdminController@search_past_appointment')->name('admin.search_past_appointment');
	Route::get('edit_appointment/{id}', 'AdminController@edit_appointment')->name('admin.edit_appointment');
	Route::patch('edit_appointment/{id}', 'AdminController@update_appointment')->name('admin.update_appointment');
	Route::delete('delete_appointment/{id}', 'AdminController@destroy_appointment')->name('admin.delete_appointment');

	Route::get('edit_patient/{id}', 'AdminController@edit_patient')->name('admin.edit_patient');
	Route::patch('edit_patient/{id}', 'AdminController@update_patient')->name('admin.update_patient');
	Route::delete('delete_patient/{id}', 'AdminController@destroy_patient')->name('admin.destroy_patient');

	Route::get('edit_doctor/{id}', 'AdminController@edit_doctor')->name('admin.edit_doctor');
	Route::patch('edit_doctor/{id}', 'AdminController@update_doctor')->name('admin.update_doctor');
	Route::delete('delete_doctor/{id}', 'AdminController@destroy_doctor')->name('admin.destroy_doctor');

	Route::get('show_patient/{id}', 'AdminController@show_patient')->name('admin.show_patient');
	Route::get('show_doctor/{id}', 'AdminController@show_doctor')->name('admin.show_doctor');

	Route::get('search_patient', 'AdminController@search_patient')->name('admin.search_patient');
	Route::get('search_doctor', 'AdminController@search_doctor')->name('admin.search_doctor');
	Route::get('search_bill', 'AdminController@search_bill')->name('admin.search_bill');
	Route::get('search_medicine', 'AdminController@search_medicine')->name('admin.search_medicine');
});

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterPatientController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterPatientController@register')->name('register.submit');

// Password Reset Routes...
Route::prefix('password')->group(function() {
	Route::get('reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('reset', 'Auth\ResetPasswordController@reset');
});

// Main Pages
Route::get('/', 'PagesController@getIndex')->name('pages.index');
