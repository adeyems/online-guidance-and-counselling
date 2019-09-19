<?php

namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Notifications\Notifiable;
    use Symfony\Component\HttpFoundation\Request;

class AppointmentBooking extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'appointment_bookings';
    protected $primaryKey = 'appointment_bookings_reference_no';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'student_no', "request_date", 'subject_of_booking'
    ];

    public static function create(Request $request) {
        $appointmentBooking = new AppointmentBooking();

        $appointmentBooking->appointment_bookings_reference_no = $request->appointment_bookings_reference_no;
        $appointmentBooking->student_no = $request->student_no;
        $appointmentBooking->appointment_date = $request->appointment_date;
        $appointmentBooking->subject_of_booking = $request->subject;

        return $appointmentBooking->save();

    }

    public static function getByStudentNo(string $studentNo){
        return self::select("appointment_bookings_reference_no")->where("student_no", $studentNo)->orderBy('created_at', "DESC")->get();
    }

}
