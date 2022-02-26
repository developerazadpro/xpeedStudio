<?php

  class Reports extends Controller {
    
    public function __construct(){     
      $this->reportModel = $this->model('Report');
      $this->userModel = $this->model('User');      
        
    }    
    
    public function index(){
      $reports = $this->reportModel->getReports();
      $users   = $this->userModel->getUsers();
      $data = [
          'reports' => $reports,
          'users'   => $users,
      ];
      $this->view('reports/index', $data);
    }

    public function add(){     
        if(!isLoggedIn()){
            redirect('users/login');
        }   
        $this->view('reports/add');
    }
   
    public function addSubmit(){
        $errors = [];
        $data = [];

        if (empty($_POST['amount'])) {
            $errors['amount'] = 'Amount is required.';
        }
        if (empty($_POST['buyer_email'])) {
            $errors['buyer_email'] = 'Buyer Email is required.';
        }
        if (empty($_POST['receipt_id'])) {
            $errors['receipt_id'] = 'Receipt ID is required.';
        }        
        $items = $_POST['items'];
        foreach($items as $item){
            if (empty($item)) {
                $errors['items'] = 'Item is required.';
            }
        }        
        if (empty($_POST['buyer'])) {
            $errors['buyer'] = 'Buyer Name is required.';
        }
        if (empty($_POST['phone'])) {
            $errors['phone'] = 'Phone is required.';
        }
        if (empty($_POST['city'])) {
            $errors['city'] = 'City is required.';
        }
        if (empty($_POST['note'])) {
            $errors['note'] = 'Note is required.';
        }

        if (!empty($errors)) {
            $data['success'] = false;
            $data['errors']  = $errors;
        } else {
            $data = [
                'amount'      => trim($_POST['amount']),
                'buyer'       => trim($_POST['buyer']),
                'receipt_id'  => trim($_POST['receipt_id']),
                'items'       => json_encode($_POST['items']),
                'buyer_email' => trim($_POST['buyer_email']),
                'buyer_ip'    => $_SERVER['REMOTE_ADDR'],
                'note'        => trim($_POST['note']),
                'city'        => trim($_POST['city']),
                'phone'       => trim($_POST['phone']),
                'hash_key'    => password_hash($_POST['receipt_id'], PASSWORD_DEFAULT),
                'entry_by'    => $_SESSION['user_id'],
            ];            
            if($this->reportModel->addReport($data)){
                $data['success'] = true;
                $data['message'] = 'Success! Your report have been added.';
            }else{
                $data['success'] = false;
                $data['message'] = 'Error! Something went wrong.';
            }            
        }
        echo json_encode($data);
    }

    public function delete(){
        $errors = [];
        $data = [];

        if (empty($_POST['report_id'])) {
            $errors['name'] = 'Report not found';
        }

        if (!empty($errors)) {
            $data['success'] = false;
            $data['message'] = $errors;
        } else {
            $data = [
                'report_id' => trim($_POST['report_id']),
            ];   
            if($this->reportModel->deleteReport($data['report_id'])){
                $data['success'] = true;
                $data['message'] = 'Success! Report has been deleted.';
            }else{
                $data['success'] = false;
                $data['message'] = 'Error! Something went wrong.';
            }
            
        }
        echo json_encode($data);
    }

    public function search(){        
        $data = [];
        $data['fromDate'] = date('Y-m-d', strtotime($_POST['from_date']));
        $data['toDate']   = date('Y-m-d', strtotime($_POST['to_date']));
        $data['userId']   = $_POST['user_id'];
        
        $reports = $this->reportModel->searchReport($data);
        //echo '<pre>'; print_r($reports);exit();
        $html = '';
        $html .= '<tbody>
                    <tr>
                        <th>Sl</th>
                        <th>Amount</th>
                        <th>Buyer Name</th>
                        <th>Receipt ID</th>
                        <th>Buyer Email</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Note</th>                    
                        <th>Action</th>
                    </tr>';
        if(!empty($reports)){
            foreach($reports as $key => $report){
                $html .= '
                    <tr>
                        <td>'. ++$key.'</td>
                        <td>$'.number_format($report->amount).'</td>
                        <td>'.$report->buyer.'</td>
                        <td>'.$report->receipt_id.'</td>
                        <td>'.$report->buyer_email.'</td>                    
                        <td>'.$report->city.'</td>
                        <td>+880 '.$report->phone.'</td>
                        <td>'.$report->note.'</td>
                        <td>
                            <a href="#" data-id="'.$report->id.'" class="btn btn-sm btn-danger delete-report">Delete</a>
                        </td>
                    </tr>';
            }
        }else{
            $html .= '<tr>
                        <td class="text-center" colspan="9">No data found.</td>
                    </tr>
                <tbody>';
        }
        $data['success'] = true;
        $data['result']  = $html;
        echo json_encode($data);
    }
    
}