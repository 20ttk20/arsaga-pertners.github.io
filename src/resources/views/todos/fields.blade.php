<div class="form-group row">
        <label for="inputCategory" class="col-sm-2 col-form-label">カテゴリー</label>
        <div class="col-sm-10">
            <select name="category" id="inputCategory" value="{{ $todo->category ?? ''}}">
                <option value="Food">Food</option>
                <option value="Hotel">Hotel</option>
                <option value="Spot">Spot</option>
            </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputCategory" class="col-sm-2 col-form-label">場所</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" name="place_name" value="{{ $todo->place_name ?? ''}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputCategory" class="col-sm-2 col-form-label">メモ</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmail3" name="memo" value="{{ $todo->memo ?? ''}}">
        </div>
      </div>
      <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">保存</button>
                <a href="{{ route('todos.index') }}" class="btn btn-secondary">一覧に戻る</a>
              </div>
            </div>
