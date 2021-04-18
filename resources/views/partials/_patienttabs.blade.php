<ul class="nav nav-tabs nav-justified w-100">
    <li class="nav-item">
        <a class="nav-link tabCol {{$tab[0]}}" href="{{ route('patient.appointment_page') }}">Appointments</a>
    </li>
    <li class="nav-item">
        <a class="nav-link tabCol {{$tab[1]}}" href="{{ route('patient.doctor_page') }}">Search Doctors</a>
    </li>
    <li class="nav-item">
        <a class="nav-link tabCol {{$tab[2]}}" href="{{ route('patient.medicine_reminder_page') }}">Medicine Reminder</a>
    </li>
    <li class="nav-item">
        <a class="nav-link tabCol {{$tab[3]}}" href="{{ route('patient.medical_history_page') }}">Medical History</a>
    </li>
</ul>
