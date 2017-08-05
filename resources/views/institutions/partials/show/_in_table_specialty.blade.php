<tr bgcolor="{{ $bgColor ?? '' }}">
    <td>
        <a href="{{ route('specialties.show', $model) }}">
            {{ $model->title }}
        </a>
    </td>
     <td class="single line">
        {{ $model->code }}
    </td>
    <td>
        @if ($model->pivot->study_price === 0)
            <b style="color:#ff831f">Бюджет</b>
        @else
            {{ $model->pivot->study_price }}
        @endif
    </td>
    <td>
        {{ $model->pivot->study_period }}
    </td>
    <td>
        @isset($model->pivot->form)
            {{ translate($model->pivot->form, 'i', 's', true) }}
        @endisset
    </td>
</tr>
