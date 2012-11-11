<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }


public function index()
    {


        if($this->session->userdata('memberid'))
            {


                $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');
                $this->load->library('pagination');
                $this->load->database();
                $this->load->model('Search_model');
                $this->load->model('Message_model');

                //config for pagination class
                $config['base_url'] = base_url() . "search/results";
                $config['per_page'] = 6;
                $config['uri_segment'] = 3;
                $config['next_link'] = '>';
                $config['prev_link'] = '<';
                $config['last_link'] = FALSE;
                $config['first_link'] = FALSE;


                //implement pagination and pass the correct parameters to the model
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


                $data['title'] = 'Search';
                $data['username'] = $this->session->userdata('username');




                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                    $this->form_validation->set_rules('content', 'Content', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');

                    if ($this->form_validation->run() === FALSE)
                    {


                        //unset any prior session search parameters
                        $this->session->unset_userdata('terms', 'city', 'state', 'categoryid', 'offset');

                        $data['categories'] = $this->Message_model->load_business_categories();
                        $data['city'] = $this->Message_model->get_user_city($this->session->userdata('memberid'));
                        $data['state'] = $this->Message_model->get_user_state($this->session->userdata('memberid'));

                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/sub_nav.php', $data);
                        $this->load->view('search', $data);
                        $this->load->view('templates/footer');

                    }
                    else
                    {
                        //check to see if search form post data already exists, if not, then set it
                        if (! $this->session->userdata('terms'))
                            {
                                $this->session->set_userdata('terms', $this->input->post('content'));
                                $this->session->set_userdata('city', $this->input->post('city'));
                                $this->session->set_userdata('state', $this->input->post('state'));
                                $this->session->set_userdata('categoryid', $this->input->post('category'));
                            }

                        $config['total_rows'] = $this->Search_model->count_all_search_results();
                        $this->pagination->initialize($config);
                        $data["links"] = $this->pagination->create_links();

                        //pass pagination, data and parameters to the view
                        $data['total'] = $config['total_rows'];
                        $data['per_page'] = $config['per_page'];
                        $data['searches'] = $this->Search_model->search($config["per_page"], $page);

                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/sub_nav.php', $data);
                        $this->load->view('search_results', $data);
                        $this->load->view('templates/footer');

                    }

            }

        else
            {

                redirect('home', 'refresh');

            }

    }

public function results()
    {

        if($this->session->userdata('memberid'))
        {
            $this->load->library('pagination');
            $this->load->database();
            $this->load->model('Search_model');

            //config for pagination class
            $config['base_url'] = base_url() . "search/results";
            $config['per_page'] = 6;
            $config['uri_segment'] = 3;
            $config['next_link'] = '>';
            $config['prev_link'] = '<';
            $config['last_link'] = 'Last';
            $config['first_link'] = 'First';


            //implement pagination and pass the correct parameters to the model
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $data['title'] = 'Search Results';
            $data['username'] = $this->session->userdata('username');

            $config['total_rows'] = $this->Search_model->count_all_search_results();
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();

            //pass pagination, data and parameters to the view
            $data['total'] = $config['total_rows'];
            $data['per_page'] = $config['per_page'];
            $data['searches'] = $this->Search_model->search($config["per_page"], $page);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sub_nav.php', $data);
            $this->load->view('search_results', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            redirect('home', 'refresh');
        }
    }

}