@extends('layouts.admin')
@section('head')
    <meta name="robots" content="index, nofollow">
@stop

@section('content')
    <div>
        <h1>Manuals</h1>
        <a href="{{ route('admin.createManual') }}">Nieuwe handleiding</a>
        <table class="table">
            <thead>
            <tr>
                <th>Merk</th>
                <th>Type</th>
                <th>Link</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
                $printedManuals = [];
            ?>
            @foreach($manuals as $manual)
                @foreach ($manual->types as $type)
                    @if(!in_array($manual->id, $printedManuals))
                        <tr>
                            <td>{{ $type->brand->name }}</td>
                            <td class="type-name-column">
                                <?php
                                    $typeNames = [];
                                ?>
                                @foreach($manuals as $manualItem)
                                    @foreach ($manualItem->types as $typeItem)
                                        @if($manualItem->id == $manual->id)
                                            <?php $typeNames[] = $typeItem->name; ?>
                                        @endif
                                    @endforeach
                                @endforeach
                                {{ implode(', ', array_unique($typeNames)) }}
                            </td>
                            <td><a href="{{ $manual->originUrl }}">{{ $manual->filename }}</a></td>
                            <td><a href="#">Aanpassen</a></td>
                            <td><a href="{{ route('admin.delete', $manual->id) }}"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                        <?php $printedManuals[] = $manual->id; ?>
                    @endif
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
@stop
