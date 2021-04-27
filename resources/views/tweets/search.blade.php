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
                @forelse($tweets as $tweet)
                    <div class="card border border-primary shadow-card card-margin">
                        <div class="card-body">
                            <h3 class="card-title">For {{ ucfirst($tweet->location->name) }}</h3>
                            @if($tweet->isVerified())
                                    <h6 class="card-subtitle text-muted verified">This is verified <span class="fa fa-check-circle text-primary"></span></h6>
                            @else
                            <h6 class="card-subtitle verified text-danger">This tweet is not verified.</h6>
                            @endif
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
                            @if(count($tweet->tweet_attachments) != 0)
                                    <div class="d-flex justify-content-center">
                                        <div class="gallery-item">
                                            <a href="{{$tweet->tweet_attachments[1-1]->url}}" alt="">
                                                <div class="slider">
                                                    <div id="images{{ $loop->iteration }}" class="owl-carousel owl-theme images">
                                                        @foreach($tweet->tweet_attachments as $attachment)
                                                            <img src="{{ $attachment->url }}" alt="">
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                            @endif
                            <div class="workedbuttons">
                                <span class="fa fa-thumbs-o-up text-center btn-worked"></span>
                                <!-- <span class="fa fa-thumbs-o-down text-center btn-not-worked"></span> -->
                                <input type="hidden" value="1" class="tweet_id">
                                <div class="alertDiv"></div>
                            </div>
                            <span class="text-muted worked-for font-weight-bold">This worked for <span class="worked-number">725</span> people</span>
                        </div>
                    </div>
                @empty
                        <h2>No searches available, please check again</h2>
                @endforelse
                </div>
            </div>
        </div>
@endsection

@section("page-level-scripts")
<script>

$previous_selected_locations = {!!json_encode(request()->locations)!!}
$previous_selected_resources = {!!json_encode(request()->resources)!!}
$(document).ready(function() {
    $('.cities').select2();
    $('.cities').val($previous_selected_locations);
    $('.cities').trigger("change");
});
$(document).ready(function() {
    $('.needs').select2();
    $(".needs").val($previous_selected_resources);
    $(".needs").trigger("change");
});
</script>
@endsection