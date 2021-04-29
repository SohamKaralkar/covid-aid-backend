@extends("layouts.layout")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="heading">
                <h3>Developers of this site</h3>
                <p>By the grace of God, we got the opportunity to serve the people of our country in these difficult times</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="dev-card border">
                <div class="dev-image">
                    <img src="{{asset('images/team/hardik.png')}}" alt="">
                </div>
                <div class="dev-name text-center">
                    <h4 class="mt-3">Hardik Srivastava</h4>
                    <div class="icons">
                        <a target="_blank" href="https://www.instagram.com\haaaaaaardik"><img src="{{asset('images/team/iconfinder_1_Instagram_colored_svg_1_5296765.png')}}" alt=""></a>
                        <a target="_blank" href="https://www.github.com\oddlyspaced"><img src="{{asset('images/team/iconfinder_github_317712.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dev-card border">
                <div class="dev-image">
                    <img src="{{asset('images/team/soham.jpg')}}" alt="">
                </div>
                <div class="dev-name text-center">
                    <h4 class="mt-3">Soham Karalkar</h4>
                    <div class="icons">
                        <a target="_blank" href="https://www.instagram.com\soham_k_9"><img src="{{asset('images/team/iconfinder_1_Instagram_colored_svg_1_5296765.png')}}" alt=""></a>
                        <a target="_blank" href="https://www.github.com\SohamKaralkar"><img src="{{asset('images/team/iconfinder_github_317712.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dev-card border">
                <div class="dev-image">
                    <img src="{{asset('images/team/somil.jpeg')}}" alt="">
                </div>
                <div class="dev-name text-center">
                    <h4 class="mt-3">Somil Gupta</h4>
                    <div class="icons">
                        <a target="_blank" href="https://www.instagram.com/somil.gupta24"><img src="{{asset('images/team/iconfinder_1_Instagram_colored_svg_1_5296765.png')}}" alt=""></a>
                        <a target="_blank" href="https://github.com\somil24"><img src="{{asset('images/team/iconfinder_github_317712.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dev-card border">
                <div class="dev-image">
                    <img src="{{asset('images/team/sahil.jpg')}}" alt="">
                </div>
                <div class="dev-name text-center">
                    <h4 class="mt-3">Sahil Dalvi</h4>
                    <div class="icons">
                        <a target="_blank" href="https://www.instagram.com/sahildalvi019"><img src="{{asset('images/team/iconfinder_1_Instagram_colored_svg_1_5296765.png')}}" alt=""></a>
                        <a target="_blank" href="https://www.github.com/dalvisahil"><img src="{{asset('images/team/iconfinder_github_317712.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="special-thanks">
                <h3 class="text-center">Special Thanks to</h3>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-3">
            <div class="dev-card border center-card">
                <div class="dev-name text-center">
                    <h4 class="mt-3">Saaquib Neyazi</h4>
                    <span></span>
                    <div class="icons">
                        <a target="_blank" href="https://instagram.com/saaquib_neyazi"><img src="{{asset('images/team/iconfinder_1_Instagram_colored_svg_1_5296765.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dev-card border center-card last-card-thanks">
                <div class="dev-name text-center">
                    <h4 class="mt-3">Akshay Kumar jha</h4>
                    <span></span>
                    <div class="icons">
                        <a target="_blank" href="https://instagram.com/imakshay.jha"><img src="{{asset('images/team/iconfinder_1_Instagram_colored_svg_1_5296765.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection