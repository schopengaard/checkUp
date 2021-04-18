
<a id="optionDrop" class="btn btn-sm nodeco rounded-circle mainColor3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="font-size: 10pt">
    <i class="fas fa-chevron-down"></i>
</a>

<div class="dropdown-menu dropdown-menu-right" aria-labelledby="optionDrop">
    <a class="dropdown-item actDropItem" href="{{ action( $drop[0] , $row->id) }}">
        Show
    </a>
    @if (count($drop) > 1)
    <div class="dropdown-divider"></div>
    <a class="dropdown-item actDropItem" href="{{ action( $drop[1] , $row->id) }}">
        Edit
    </a>
    @endif
    @if (count($drop) > 2)
    <div class="dropdown-divider"></div>
    <a class="dropdown-item actDropItem" href="{{ action( $drop[2] , $row->id) }}">
        Delete
    </a>
    @endif
</div>
