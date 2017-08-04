<div id="vuzik_2">
    <table class="ui celled padded table">
        <thead>
            <tr>
                <th class="single line">Специальность</th>
                <th>Код</th>
                <th>Стоимость за 1 год</th>
                <th>Срок обучения</th>
                <th>Форма обучения</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($institution->specialties_distinct as $specialty)

                @php
                    $qualifications = $specialty->qualificationsOf($institution);
                @endphp

                @if (count($qualifications))

                    <tr bgcolor="#fffbd1">
                        <td colspan="5">
                            <a href="{{ route('specialties.show', $specialty) }}">
                                {{ $specialty->getNameWithCodeOrName() }}
                            </a>
                        </td>
                    </tr>

                    @foreach ($qualifications as $qualification)
                        @include ('institutions/partials/show/_in_table_specialty', [
                            'model' => $qualification
                        ])
                    @endforeach
                @else
                    @include ('institutions/partials/show/_in_table_specialty', [
                        'model' => $specialty,
                        'bgColor' => '#fffbd1'
                    ])
                @endif
            @endforeach
        </tbody>
    </table>
</div>
