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
                <tr>
                    <td bgcolor="#fffbd1" colspan="5">
                        <a href="{{ route('specialties.show', $specialty) }}">
                            {{ $specialty->getNameWithCodeOrName() }}
                        </a>
                    </td>
                </tr>

                @foreach ($specialty->qualifications as $qualification)
                    @foreach (['full-time', 'extramural', 'distant'] as $form)
                        @if ($institution->hasSpecialty($qualification, $form))
                            <tr>
                                <td>
                                    <a href="{{ route('specialties.show', $specialty) }}">
                                        {{ $qualification->title }}
                                    </a>
                                </td>
                                <td class="single line">{{ $qualification->code }}</td>
                                <td>
                                    @isset($qualification->pivot->study_price)
                                        @if($qualification->pivot->study_price == 0)
                                            <b style="color:#ff831f">Бюджет</b>
                                        @else
                                            {{ $qualification->pivot->study_price }}
                                        @endif
                                    @endisset
                                </td>
                                <td>
                                    @isset($qualification->pivot->study_period)
                                        {{ $qualification->pivot->study_period }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($qualification->pivot->form)
                                        {{ translate($qualification->pivot->form, 'i', 's') }}
                                    @endisset
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
