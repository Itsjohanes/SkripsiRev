<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Notif extends CI_Controller
{
    private $role;
    public function __construct()
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '2048M');
        parent::__construct();
        $this->load->model('Chat_model');
       
    }

    // Controller method to retrieve chat notifications
    public function getChatNotifications()
    {
        // Query database or perform necessary operations to get chat notifications
        $chatNotifications = $this->Chat_model->getChatData(); // Change this line according to your actual model method

        // Prepare response data
        $notifications = array();
        foreach ($chatNotifications as $notification) {
            // Format each notification as an associative array
            $formattedNotification = array(
                'id_pengirim' => $notification->id_pengirim,
                'nama' => $notification->nama,
                'waktu' => $notification->waktu,
                // Add more properties as needed
            );
            // Add formatted notification to the response array
            $notifications[] = $formattedNotification;
        }

        // Prepare response array
        $response = array(
            'count' => count($notifications), // Count of chat notifications
            'notifications' => $notifications // List of formatted chat notifications
        );

        // Send response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }





}
