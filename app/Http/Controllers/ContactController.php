<?php

namespace App\Http\Controllers;
use App\Contact;
require_once("contactConst.php");

use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function index(){
    if (!file_exists(CSV_FILE)) {
			$fp = fopen(CSV_FILE, 'w');
			fclose($fp);
		}
		$content= file(CSV_FILE);
    $contacts=[];
    foreach ($content as $line) {
			$row= str_getcsv($line);
      $contacts[]=$row;
    }
    return view('index',compact('contacts'));

   }
   function store(Request $request)
   {
	  $contact=new Contact();
	  $contact->id = Contact::lastID() + 1;
    $contact->name = $request->name;
	  $contact->lastName = $request->lastName;
	  $contact->email = $request->email;
	  $contact->tel = $request->tel;
	  $contact->file =  $_FILES['file']['name'];
    $contact->addContact($contact);
    $file = $request->file('file');
    if (!is_null($file)) {
      $fn= $file->getClientOriginalName();
      $file->move(public_path(), $fn);
    }

    return redirect('/');
  }

function update(Request $request) {
  $contact=Contact::findContact($request->id);
  $contact->name = $request->name;
  $contact->lastName = $request->lastName;
  $contact->email = $request->email;
  $contact->tel = $request->tel;
  $contact->file = $_FILES['file']['name'];
  $file = $request->file('file');
  $contact->updateContact( $contact );
  if (!is_null($file)) {
    $fn= $file->getClientOriginalName();
    $file->move(public_path(), $fn);
  }
  return redirect('/');
}

  function edit($id){
    $contact=Contact::findContact($id);
    return view('Contacts.edit', compact('contact'));
  }
  function delete($id){
    $contact=Contact::findContact($id);
    if (!is_null($contact)) {
      $contact->deleteContact($contact);
    }
    return redirect('/');
  }

};