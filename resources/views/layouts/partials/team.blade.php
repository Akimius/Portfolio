<section class="bg-light" id="team">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Our Amazing Team</h2>
                <h3 class="section-subheading text-muted">is our asset</h3>
            </div>
        </div>

        <div class="row">

            @if(count($teams)<1)
                <div class="col-lg-8 mx-auto text-center" style="color: orangered">
                    <p class="large text-muted"><h3>No team members so far</h3></p>
                </div>
            @else

            @foreach($teams as $team)

            <div class="col-sm-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="/img/myteam/{{ $team->preview }}" alt="">

                    <h4>{{ $team->name }} {{ $team->surname }}</h4>
                        <p class="text-muted">{{ $team->position }}</p>

                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
         @endif
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <p class="large text-muted"><h6>We are proud of our team!!!</h6></p>
            </div>
        </div>
    </div>

</section>