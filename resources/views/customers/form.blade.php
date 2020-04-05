

 <div class="form-group ">
    <label for="title">Title</label>
    <input type="text" name="title" placeholder="Title" value="{{old('title') ?? $customer->title}}" class="form-control">
    <div>
        {{$errors->first('title')}}
    </div>
</div>

<div class="form-group ">
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="Name" value="{{old('name') ?? $customer->name}}" class="form-control">
        <div>
            {{$errors->first('name')}}
        </div>
</div>

<div class="form-group ">
    <label for="email">Email</label>
    <input type="text" name="email" placeholder="Email" value="{{old('email') ?? $customer->email}}" class="form-control">
    <div>
        {{$errors->first('email')}}
    </div>
</div>


<div class="form-group ">
    <label for="phone">Phone</label>
    <input type="text" name="phone" placeholder="Phone" value="{{old('phone') ?? $customer->phone}}" class="form-control">
    <div>
        {{$errors->first('phone')}}
    </div>
</div>

<div class="form-group ">
    <label for="active">Status</label>
    <select name="active" id="active" class="form-control">
        <option value="" disabled>Select customer status</option>
        @foreach ($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
            <option value="{{ $activeOptionKey }}" {{ $customer->active == $activeOptionValue ? 'selected' : '' }}>{{ $activeOptionValue }}</option>
        @endforeach
    </select>
</div>

<div class="form-group ">
    <label for="company_id">Company</label>
    <select name="company_id" id="company_id" class="form-control">
        @foreach ($companies as $company)
            <option value="{{ $company->id }}" {{ $company->id  == $customer->company_id ? 'selected' : ''}}>  {{ $company->name }}</option>
        @endforeach
    </select>
</div>
    @csrf