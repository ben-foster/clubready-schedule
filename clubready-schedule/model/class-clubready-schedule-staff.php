<?php

class ClubReady_Schedule_Staff {
    
    // TODO: annotate
    public $user_id;
    public $email;
    public $first_name;
    public $last_name;
    public $staff_type_id;
    public $primary_store_id;

    public function __construct( $clubready_staff ) {
        $this->user_id = $clubready_staff["UserId"];
        $this->email = $clubready_staff["Email"];
        $this->first_name = $clubready_staff["FirstName"];
        $this->last_name = $clubready_staff["LastName"];
        $this->staff_type_id = $clubready_staff["StaffTypeId"];
        $this->primary_store_id = $clubready_staff["PrimaryStoreId"];
    }
           
}