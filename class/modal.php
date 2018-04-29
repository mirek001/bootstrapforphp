<?php

class DND_BOOTSTRAPv4_MODAL{

	private $_modal_button_class = "btn btn-primary";
	private $_modal_dialog_class = "modal-dialog modal-dialog-centered"; //opcjonalnie modal-lg, modal-sm
	private $_data_toggle = "modal"; //tego chyba nie powinno sie zmieniac
	private $_data_target = null;

	private $_modal_id = null;
	private $_modal_button_name = "modal_button_name";

	private $_header_type = 'default'; // inne: disable,
	private $_header_text = 'header_text'; 

	private $_body_type = 'text'; // inne: disable, form1field
	private $_body_text = 'body_text'; // inne: disable

	private $_form_action_file = '#';
	private $_form_send_method = 'GET';

	private $_form_1field_title = 'form_1field_title'; // wyswietlana nazwa pola
	private $_form_1field_name = 'form_1field_name'; // id oraz nazwa wysylanego elementu
	private $_form_1field_placeholder = 'form_1field_placeholder'; 
	private $_form_1field_help_text = 'form_1field_help_text';

	private $_form_1field_hidden = "disable"; //domyslnie wylaczone ukryte pole
	private $_form_1field_hidden_name = "form_1field_hidden_name";
	private $_form_1field_hidden_value = "form_1field_hidden_value";

	private $_footer_type = 'default';

	private $_body_close_button_name = "body_close_button_name";
	private $_body_close_button_class = "btn btn-secondary";
	private $_body_submit_button_name = 'body_submit_button_name';
	private $_body_submit_button_class = "btn btn-primary";
	private $_body_submit_button_href = "#";


////////////////////////////////
////////////////////////////////
////////////////////////////////
	public function __construct($modal_id){
		$this->_data_target = $modal_id.'Modal';
		$this->_modal_id = $this->_data_target.'Window';
	} //end function __construct();
////////////////////////////////
////////////////////////////////
////////////////////////////////
private function modal_header(){
switch ($this->_header_type){
	case 'disable':
		return<<<END
END;
	case 'default':
		return<<<END
			<div class="modal-header">
				<h5 class="modal-title" id="$this->_modal_id">$this->_header_text</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="$this->_body_close_button_name"><span aria-hidden="true">&times;</span></button>
			</div>
END;
}// end switch
}// end function modal_body();
////////////////////////////////
////////////////////////////////
////////////////////////////////
private function modal_body(){

	///////////////////////////
	if($this->_body_text == 'disable'){
		$body_text = '';
	} else {
		$body_text = '<p>'.$this->_body_text.'</p>';
	} //end if
	///////////////////////////
	if($this->_form_1field_hidden == 'enable'){
		$hidden_field = '<input type="hidden" name="'.$this->_form_1field_hidden_name.'" value="'.$this->_form_1field_hidden_value.'">';
	} else {
		$hidden_field='';
	} //end if
	///////////////////////////
	if($this->_form_1field_help_text == 'disable'){
		$help_text = '';
	} else {
		$help_text = '<small id="'.$this->_form_1field_name.'-Help" class="form-text text-muted">'.$this->_form_1field_help_text.'</small>';
	} //end if
	///////////////////////////
switch ($this->_body_type){
	case 'disable':
		return<<<END
END;
	case 'text':
		return<<<END
			<div class="modal-body">
				$this->_body_text
			</div>
END;
	case 'form_1field':
		return<<<END
			<div class="modal-body">
				$body_text
				<form action="$this->_form_action_file" method="$this->_form_send_method">
				  $hidden_field
				  <div class="form-group">
				    <label for="$this->_form_1field_name">$this->_form_1field_title</label>
				    <input type="text" class="form-control" id="$this->_form_1field_name" name="$this->_form_1field_name" aria-describedby="$this->_form_1field_name-Help" placeholder="$this->_form_1field_placeholder">
				    $help_text
				  </div>
				  <button type="button" class="$this->_body_close_button_class" data-dismiss="modal">$this->_body_close_button_name</button>
				  <input class="$this->_body_submit_button_class" type="submit" value="$this->_body_submit_button_name">
				</form>
			</div>
END;
}// end switch
}// end function modal_header();
////////////////////////////////
////////////////////////////////
////////////////////////////////
private function modal_footer(){
switch ($this->_footer_type){
	case 'default':
		return<<<END
			<div class="modal-footer">
				<button type="button" class="$this->_body_close_button_class" data-dismiss="modal">$this->_body_close_button_name</button>
				<a class="$this->_body_submit_button_class" href="$this->_body_submit_button_href" role="button">$this->_body_submit_button_name</a>

			</div>
END;
	case 'disable':
		return<<<END
END;
}// end switch
}// end function modal_footer();
////////////////////////////////
////////////////////////////////
////////////////////////////////
////////////////////////////////
////////////////////////////////
////////////////////////////////
public function display(){
	$modal_header = $this->modal_header();
	$modal_body = $this->modal_body();
	$modal_footer = $this->modal_footer();
return<<<END
<!-- modal button $this->_data_target BEGIN -->
<button type="button" class="$this->_modal_button_class" data-toggle="$this->_data_toggle" data-target="#$this->_data_target">$this->_modal_button_name</button>

	<div class="modal fade" id="$this->_data_target" tabindex="-1" role="dialog" aria-labelledby="$this->_modal_id" aria-hidden="true">
	  <div class="$this->_modal_dialog_class" role="document">';
	    <div class="modal-content">
	    	$modal_header
	     	$modal_body
	     	$modal_footer
	    </div>
	  </div>
	</div>
<!-- modal button $this->_data_target END -->
END;
} //end function display();
////////////////////////////////
////////////////////////////////
////////////////////////////////
////////////////////////////////
////////////////////////////////
////////////////////////////////
	public function set($name, $newvar){
		$name = '_'.$name;
		$this->$name = $newvar;
	} //end function set();
////////////////////////////////
////////////////////////////////
////////////////////////////////
} //end class DND_BOOTSTRAPv4_MODAL













?>