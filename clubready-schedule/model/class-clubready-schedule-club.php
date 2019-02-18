<?php

class ClubReady_Schedule_Club {
	
    /**
	 * The ClubReady club id of this club.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      integer    $club_id    The unique identifier this club in ClubReady.
	 */
    public $club_id;

    /**
	 * The name of this club in ClubReady.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $name    The name of this club in ClubReady.
	 */
    public $name;

    /**
	 * The district id of this club in ClubReady.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      integer    $district_id   The district id of this club in ClubReady.
	 */
    public $district_id;

    /**
	 * The division id of this club in ClubReady.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      integer    $division_id    The division id of this club in ClubReady.
	 */
    public $division_id;

    /**
	 * The club type of this club in ClubReady.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $club_type    The club type of this club in ClubReady.
	 */
    public $club_type;

    /**
	 * The credit balance of this club in ClubReady.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      integer    $credit_balance    The credit balance of this club in ClubReady.
	 */
    public $credit_balance;

    /**
	 * The time offset of this club in ClubReady.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      integer    $time_offset    The time offset of this club in ClubReady.
	 */
    public $time_offset;

    /**
	 * The chain id of this club in ClubReady.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      integer    $chain_id    The chain id of this club in ClubReady.
	 */
    public $chain_id;

    /**
	 * The address street of this club in ClubReady.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $address_street    The address street of this club in ClubReady.
	 */
    public $address_street;

    /**
	 * The address city of this club in ClubReady.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $address_city    The address city of this club in ClubReady.
	 */
    public $address_city;

    /**
	 * The address state/prov of this club in ClubReady.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $address_state_prov    The address state/prov of this club in ClubReady.
	 */
    public $address_state_prov;

    /**
	 * The address postal code of this club in ClubReady.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $address_postal_code    The address state/prov of this club in ClubReady.
	 */
    public $address_postal_code;

    /**
	 * The phone number of this club in ClubReady.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $phone    The phone number of this club in ClubReady.
	 */
    public $phone;

    /**
	 * The email address of this club in ClubReady.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $phone    The email address of this club in ClubReady.
	 */
    public $email;

    /**
	 * The name of this club in ClubReady. Unknown why this is distinct from name.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $locatiob_name    The name of this club in ClubReady.
	 */
	public $location_name;
	
	// TODO: annotate
    public function __construct( $clubready_club ) {
        $this->club_id = $clubready_club["Id"];
        $this->name = $clubready_club["Name"];
        $this->district_id = $clubready_club["DistrictId"];
        $this->division_id = $clubready_club["DivisionId"];
        $this->club_type = $clubready_club["ClubType"];
        $this->credit_balance = $clubready_club["CreditBalance"];
        $this->time_offset = $clubready_club["TimeOffset"];
        $this->chain_id = $clubready_club["ChainId"];
        $this->address_street = $clubready_club["Address"]["Street"];
        $this->address_city = $clubready_club["Address"]["City"];
        $this->address_state_prov = $clubready_club["Address"]["StateProv"];
        $this->address_postal_code = $clubready_club["Address"]["PostalCode"];
        $this->phone = $clubready_club["Phone"];
        $this->email = $clubready_club["Email"];
        $this->location_name = $clubready_club["LocationName"];
    }
    
}