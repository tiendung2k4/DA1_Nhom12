<?php 
class BookingController {
    private $bookingModel;
    public function __construct()
    {
         $this->bookingModel = new BookingModel();
    }
    public function listBookings()
    {
        $bookings = $this->bookingModel->getAllBookings();
        require_once './views/bookings/list.php';
    }
    public function viewBooking($id)
    {
        $booking = $this->bookingModel-> getBookingById($id);
        if ($booking) {
            require_once './views/bookings/view.php';
        } else {
            echo "Booking not found.";
        }
    }
    public function createBooking()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customer_id = $_POST['customer_id'];
            $room_id = $_POST['room_id'];
            $check_in = $_POST['check_in'];
            $check_out = $_POST['check_out'];
            $status = $_POST['status'];

            $this->bookingModel->createBooking($customer_id, $room_id, $check_in, $check_out, $status);
            header('Location: /bookings');
        } else {
            require_once './views/bookings/create.php';
        }
    }
    public function deleteBooking($id)
    {
       $id = $_POST['booking_id'];
       $this->bookingModel->deleteBooking($id);
    }
}