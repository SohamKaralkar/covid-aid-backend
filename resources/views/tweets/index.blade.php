@extends("layouts.layout")

@section("content")
<div class="row">
            <div class="col-md-4 center-card">
                <form action="{{ route('tweet.search')}}" method="POST">
                @csrf
                    <div class="card shadow-card mt-4">
                        <div class="card-body">
                            <div class="select-cities">
                                <label for="cities">Select Location</label>
                                <select class="cities" name="locations[]" multiple="multiple">
                                    @foreach($locations as $location)
                                        <option value="{{$location->id}}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="select-needs">
                                <label for="needs">Select your need</label>
                                <select class="needs select-needs" name="resources[]" multiple="multiple">
                                    @foreach($resources as $resource)
                                        <option value="{{ $resource->id }}">{{ $resource->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary center-card d-block">Check</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- TWEETS -->
            <div class="col-md-8 center-card mt-5">
                <div id="tweet-data">
                    {{ dd(count($tweets))}}
                @if(count($tweets) != 1-1)
                @foreach($tweets as $tweet)
                    <div class="card border border-primary shadow-card card-margin">
                        <div class="card-body">
                            <h3 class="card-title">For {{ ucfirst($tweet->location->name) }}</h3>
                            <h6 class="card-subtitle text-muted verified">This is verified <span class="fa fa-check-circle text-primary"></span></h6>
                            <p class="card-text tweet-text">
                                {{ $tweet->content }}
                            </p>
                            <div class="phone-numbers">
                                @foreach($tweet->contacts as $contact)
                                    <p class="phone-numbers font-weight-bold">{{ $contact->number }}</p>
                                @endforeach
                            </div>

                            <div class="buttons center-card d-flex justify-content-center">
                                <a href="tel:+91123456789" class="btn btn-primary call"> <span class="fa fa-phone"></span> Call</a>
                                <a href="https://api.whatsapp.com/send?phone=+911234567890" target="_blank" rel="noopener noreferrer" class="btn btn-primary text-white"> <span class="fa fa-whatsapp"></span> Message</a>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="gallery-item">
                                    <a href="images/178391643_455273885727312_6121198004728570631_n.jpg" alt="">
                                        <div class="slider">
                                            <div id="images{{ $loop->iteration }}" class="owl-carousel owl-theme images">
                                                <img src="images/178391643_455273885727312_6121198004728570631_n.jpg" alt="">
                                                <img src="images/2.jpg" alt="">
                                                <img src="images/3.jpg" alt="">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="images/2.jpg" alt="" class="image"></a>
                                    <a href="images/3.jpg"></a>
                                </div>
                            </div>
                            <div class="workedbuttons">
                                <span class="fa fa-thumbs-o-up text-center btn-worked"></span>
                                <!-- <span class="fa fa-thumbs-o-down text-center btn-not-worked"></span> -->
                                <input type="hidden" value="1" class="tweet_id">
                                <div class="alertDiv"></div>
                            </div>
                            <span class="text-muted worked-for font-weight-bold">This worked for <span class="worked-number">725</span> people</span>
                        </div>
                    </div>
                @endforeach
                @else
                <div class="card border border-primary shadow-card card-margin">
                        <div class="card-title">
                            <h2>No searches available</h2>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
@endsection

@section("page-level-scripts")
<script>
$(document).ready(function() {
    $('.cities').select2();
});
$(document).ready(function() {
    $('.needs').select2();
});
</script>
@endsection