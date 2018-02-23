@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3 hidden-sm">
            <div class="panel panel-default">
                <div class="panel-heading">
                  @if($mechanic_profile->status == 1)
                  <span style="font-size: 12px;" class="label label-success">Available</span> 
                  @else
                  <span style="font-size: 12px;" class="label label-danger">Unavailable</span> 
                  @endif
                  <span id="switch-sched" class="btn btn-xs btn-warning pull-right"><span class="glyphicon glyphicon-book"></span> Request a schedule</span>

                </div>

                <div class="panel-body">
                    <!-- Image card -->
                    <div class="card">
                      <img class="card-img-top" style="max-width: 230px;" src="/uploads/avatars/{{ $mechanic_profile->avatar }}" alt="Card image cap">
                      <div class="card-block">
                        <h4 class="card-title">
                          <strong>{{ $mechanic_profile->name }}</strong> 
                          @if($mechanic_profile->verified == 1)
                              <span style="color: green; font-size: 14px;" data-toggle="tooltip" data-placement="top" class="glyphicon glyphicon-check" title="Verified Account"></span>
                          @endif 
                        </h4>
                        <p class="card-text">{{ $mechanic_profile->address }} <strong>{{ $mechanic_profile->zipcode }} </strong></p>
                        <p>
                        <strong>Skills</strong>
                        @foreach ($mechanic_profile->mechanicSkills as $skill)
                          <p class="list-group-item-text">{{ $skill->skill }}</p>
                        @endforeach
                        </p>
                      </div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"><label>Est. Labor Price: 1,000 </label></li>
                        <li class="list-group-item">
                          <label>Rating: {{ number_format($mechanic_profile->getMechanicAverage(),1) }} </label>
                          <span class="stars" data-rating="{{ number_format($mechanic_profile->getMechanicAverage(),0) }}" data-num-stars="{{ number_format($mechanic_profile->getMechanicAverage(),0) }}" ></span>
                        </li>
                        <div style="display: none;" id="show-contact" >
                        @foreach ($mechanic_profile->mechanicNumbers as $contact)
                          <li class="list-group-item">{{ $contact->contact_number }}</li>
                        @endforeach
                        </div>
                      </ul>
                      <div class="card-block">
                        <a id="hire-now" class="btn btn-success btn-lg btn-block">Hire Now!</a>
                      </div>
                    </div>
                    <!-- End image card -->
                    @component('components.who')
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                     <span id="switch-review" class="btn btn-xs btn-info pull-left"><span class="glyphicon glyphicon-pencil"></span> Write a review</span>
                     
                </div>

                <div class="panel-body">
                    
                    <div id="review-form">
                      <form method="POST" action="{{ route('submit.comment', $mechanic_profile->id)}}" >
                        {{ csrf_field() }}

                        <!-- Star rating -->
                          <fieldset class="rating">
                              <input type="radio" id="star5" name="rating" value="5" />
                              <label data-toggle="tooltip" data-placement="top" class = "full" for="star5" title="Awesome - 5 stars"></label>

                              <!-- <input type="radio" id="star4half" name="rating" value="4.5" />
                              <label data-toggle="tooltip" data-placement="top" class="half" for="star4half" title="Pretty good - 4.5 stars"></label> -->

                              <input type="radio" id="star4" name="rating" value="4" />
                              <label data-toggle="tooltip" data-placement="top" class = "full" for="star4" title="Pretty good - 4 stars"></label>

                              <!-- <input type="radio" id="star3half" name="rating" value="3.5" />
                              <label data-toggle="tooltip" data-placement="top" class="half" for="star3half" title="Meh - 3.5 stars"></label> -->

                              <input type="radio" id="star3" name="rating" value="3" />
                              <label data-toggle="tooltip" data-placement="top" class = "full" for="star3" title="Meh - 3 stars"></label>

                              <!-- <input type="radio" id="star2half" name="rating" value="2.5" />
                              <label data-toggle="tooltip" data-placement="top" class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> -->

                              <input type="radio" id="star2" name="rating" value="2" />
                              <label data-toggle="tooltip" data-placement="top" class = "full" for="star2" title="Kinda bad - 2 stars"></label>

                              <!-- <input type="radio" id="star1half" name="rating" value="1.5" />
                              <label data-toggle="tooltip" data-placement="top" class="half" for="star1half" title="Meh - 1.5 stars"></label> -->

                              <input type="radio" id="star1" name="rating" value="1" />
                              <label data-toggle="tooltip" data-placement="top" class = "full" for="star1" title="Sucks big time - 1 star"></label>

                              <!-- <input type="radio" id="starhalf" name="rating" value="0.5" />
                              <label data-toggle="tooltip" data-placement="top" class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> -->

                          </fieldset>
                          <!-- Star rating end -->

                          <div class="form-group"> <!-- Message input !-->
                            <textarea placeholder="Make a review. Tell others what you think to this mechanic. Would you recommend it, and why?" class="form-control" id="message_id" name="testimonial" rows="3"></textarea>
                          </div>
                          
                          <div class="form-group"> <!-- Submit button !-->
                            <button class="btn btn-primary pull-right " name="submit" type="submit"><span class="glyphicon glyphicon-send"></span> Submit</button>
                          </div>

                      </form>
                      <br>
                    </div>
                    <br>
                   <!-- Content here -->

                        @foreach ($mechanic_profile->testimonials as $user)
                        <section class="comment-list">
                          <!-- First Comment -->
                          <article class="row" style="font-size: 12px;">
                            <div class="col-md-1 col-sm-1 hidden-xs">
                              <figure class="">
                                <img class="img-responsive img-rounded" src="/uploads/avatars/{{ $user->avatar }}" />
                              </figure>
                            </div>
                            <div class="col-md-11 col-sm-11">
                              
                                
                                  <header class="text-left">
                                    <a class="comment-user"><i class="fa fa-user"></i>{{ $user->email }}</a> |
                                    <i class="fa fa-clock-o">{{ $user->pivot->created_at->diffForHumans() }}</i> | <span class="stars" data-rating="{{ $user->pivot->rating }}" data-num-stars="{{ $user->pivot->rating }}" ></span></time>
                                  </header>
                                  <div class="comment-post">
                                    <p>
                                      {{ $user->pivot->testimonial }}
                                    </p>
                                    <p>
                                      @guest
                                        no delete
                                      @else
                                        <span class="glyphicon glyphicon-remove"> | <a href="/mechanic/testimonial/{{ $user->pivot->id }}/edit"><span class="glyphicon glyphicon-edit"></a>
                                      @endguest
                                    </p>
                                  </div>
                                
                              
                            </div>
                          </article>
                        </section>
                        @endforeach
                   <!-- End content here -->
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
