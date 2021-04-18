<ul class="nav nav-tabs nav-justified w-100">
    <li class="nav-item">
        <a class="nav-link tabCol {{$tab[0]}}" href="{{ route('doctor.future_appointment_page') }}">Upcoming Appts</a>
    </li>
    <li class="nav-item">
        <a class="nav-link tabCol {{$tab[1]}}" href="{{ route('doctor.past_appointment_page') }}">Past Appts</a>
    </li>
    <li class="nav-item">
        <a class="nav-link tabCol {{$tab[2]}}" href="{{ route('doctor.patient_page') }}">Search Patients</a>
    </li>
    <li class="nav-item">
        <a class="nav-link tabCol {{$tab[3]}}" href="{{ route('doctor.schedule_page') }}">Update Schedule</a>
    </li>
</ul>
