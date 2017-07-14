<div class="two fields">
    <div class="twelve wide required field">
        <label for="title">Название</label>
        <input type="text"
               name="title"
               id="title"
               placeholder="Название профессии"
              value ="{{ old('title', $profession->title) }}"
              required>
    </div>

    <div class="four wide required field">
        <label for="prof_direction_id">Направление</label>
        <select name="prof_direction_id" id="prof_direction_id" class="ui search dropdown">
            <option value="">Направление</option>
            @foreach ($profDirections as $profDirection)
            <option value="{{ $profDirection->id }}" 
            {{ (old('prof_direction_id', $profession->profDirection->id) == $profDirection->id) ? 'selected' : '' }}>
            {{ $profDirection->title }}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="required field">
    <label for="short_description">Короткое описание</label>
    <textarea name="short_description" id="short_description" rows="5" required>{{ old('short_description', $profession->short_description) }}
    </textarea>
</div>

<div class="required field">
    <label for="full_description">Полное описание</label>
    <textarea name="full_description" id="full_description" rows="20" required>{{ old('full_description', $profession->full_description) }}
    </textarea>
</div>

<button class="ui large teal button">Сохранить</button>