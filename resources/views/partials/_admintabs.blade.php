<ul class="nav nav-tabs nav-justified w-100">
    <li class="nav-item">
        <a class="nav-link tabCol {{$tab[0]}}" href="{{ route('admin.patient_page') }}">Patients</a>
    </li>
    <li class="nav-item">
        <a class="nav-link tabCol {{$tab[1]}}" href="{{ route('admin.doctor_page') }}">Doctors</a>
    </li>
    <li class="nav-item">
        <a class="nav-link tabCol {{$tab[2]}}" href="{{ route('admin.future_appointment_page') }}">Future Appts</a>
    </li>
    <li class="nav-item">
        <a class="nav-link tabCol {{$tab[3]}}" href="{{ route('admin.past_appointment_page') }}">Past Appts</a>
    </li>
    <li class="nav-item">
        <a class="nav-link tabCol {{$tab[4]}}" href="{{ route('admin.bill_page') }}">Bill</a>
    </li>
    <li class="nav-item">
        <a class="nav-link tabCol {{$tab[5]}}" href="{{ route('admin.medicine_page') }}">Medicine</a>
    </li>
</ul>
