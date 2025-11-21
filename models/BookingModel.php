<?php 
class BookingModel extends BaseModel {
    public $booking_id;
    public $customer_id;
    public $room_id;
    public $check_in;
    public $check_out;
    public $status;

    public function getAllBookings()
    {
        $sql = "SELECT 
    booking.id_booking,
    booking.ngay_dat,
    booking.so_nguoi,
    booking.tong_tien,
    booking.trang_thai,
    khachhang.ho_ten AS ten_khachhang,
    tour.ten_tour AS ten_tour
FROM 
    booking
    INNER JOIN khachhang ON booking.id_khachhang = khachhang.id_khachhang
    INNER JOIN tour ON booking.id_tour = tour.id_tour
ORDER BY 
    booking.ngay_dat DESC;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBookingById($id) {
        $sql = "SELECT * FROM bookings WHERE booking_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createBooking($customer_id, $room_id, $check_in, $check_out, $status) {
        $sql = "INSERT INTO bookings (customer_id, room_id, check_in, check_out, status) VALUES (:customer_id, :room_id, :check_in, :check_out, :status)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':customer_id' => $customer_id,
            ':room_id' => $room_id,
            ':check_in' => $check_in,
            ':check_out' => $check_out,
            ':status' => $status
        ]);
    }
    public function deleteBooking($id) {
        $sql = "DELETE FROM bookings WHERE booking_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}