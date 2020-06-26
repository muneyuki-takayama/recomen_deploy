@if ($errors->any())
  <div class="c-error--container l-row l-row--center l-row--middle">
    <ul>
      @foreach($errors->all() as $error)
        <li>
          <i class="fas fa-exclamation-circle"></i>
          {{ $error }}
        </li>
      @endforeach
    </ul>
  </div>
@endif