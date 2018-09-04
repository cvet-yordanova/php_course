<?php
namespace dev_task\Controllers;

class TicketController extends Controller
{
   
    public function buy() {

        $this->view->success = false;

        if(isset($_POST['pay'])) {
                    $buyer_names = $_POST['names'];
                    $email = $_POST['email'];
                    $date_visit = $_POST['date-visit'];
                    $time_visit = $_POST['time'];
                    $allowed_photos = $_POST['count-photo'];
                    $adult_count = $_POST['adult-count'];
                    $children_count = $_POST['children-count'];

                    $is_buyer_empty =  $buyer_names === '';
                    $is_email_valid = filter_var($email, FILTER_VALIDATE_EMAIL);
                    $is_count_tickets_valid = (intval($adult_count) > 0) || (intval($children_count) > 0);
                    $agree_terms = isset($_POST['terms']);

                    if(!$is_buyer_empty && $is_email_valid && $is_count_tickets_valid && $agree_terms ) {

                        for ($i = 0; $i < intval($adult_count); $i++) {
                            $ticket = new \dev_task\Models\Ticket('adult', $buyer_names, $email, $date_visit, $time_visit, date("Y/m/d"));
                            $ticket->save();
                        } 

                        for ($i = 0; $i < intval($children_count); $i++) {
                            $ticket = new \dev_task\Models\Ticket('child', $buyer_names, $email, $date_visit, $time_visit, date("Y/m/d"));
                            $ticket->save();
                        }  
                        
                        $this->view->success = true;  
                    }                  

        }
        
    }

    public function all(){

        $this->view->search = false;

       $allTickets =  \dev_task\Models\Ticket::all();
       $this->view->tickets = $allTickets;

        if(isset($_POST['go'])){
            $id = $_POST['id'];
            $email = $_POST['email'];
            $date = $_POST['date'];


            $search_arr = [];

            if( $id !== '' && is_int(intval($id)))
            {

                $search_arr[] = ' id = ' .  $id;
            }

            if($email !== '')
            {
                $search_arr[] = 'email = ' . '"' . $email . '"';
            }

            if($date !== '' && $date !== 'mm/dd/yyyy')
            {
                $date_input_arr = explode('-', $date);
                $search_date = '"' . $date_input_arr[0] . '-' . $date_input_arr[1] . '-' . $date_input_arr[2] . '"';
                $search_arr[] = 'date_bought = ' . $search_date;

            }        

            $query = 'SELECT * FROM tickets WHERE ' . implode(" AND ", $search_arr) . ';';


            if(count($search_arr) == 0) {
                $query = 'SELECT * FROM tickets';
            }

            $searchedTickets =  \dev_task\Models\Ticket::search($query);

            $this->view->tickets = $searchedTickets;

        }
    }
}