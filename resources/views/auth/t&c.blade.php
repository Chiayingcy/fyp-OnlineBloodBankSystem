<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions</title>

    
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

         <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
</head>

<body>
    <div class ="d-flex justify-content-center">
    <div class="card">
    <h5 class="card-header">Terms and Conditions!</h5>
    <div class="card-body">
    
        <p class="card-text"> Introduction 
        <hr/>
        This is an Online Blood Bank System website which contains donors, hospitals and admin. These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.
 
        <br><br>People below 18 years old are not allowed to use this Website.</p>

        <br/><hr/>
        <br/>
        <h3 class="card-title">Requirement to donate Blood!</h5>

        <br/>

        <ul>
        <li>- Well and healthy </li>
        <li>- Age:</li>
        <li>- First time donor: 18-60 years old</li>
        <li>- Regular donor: 18-65 years old</li>
        <li>- Prospective donor aged 17 years old must provide written consent from his or her parents / guardian</li>
        <li>- Weight : 45kg and above</li>
        <li>- Had minimum of 5 hours sleep</li>
        <li>- Had a meal before blood donation</li>
        <li>- No medical illness</li>
        <li>- Not involved in any high risk activities such as :-</li>
        <li>- Same gender sex (homosexual)</li>
        <li>- Bisexual</li>
        <li>- Had sex with commercial sex worker</li>
        <li>- Change in sexual partner</li>
        <li>- Took intravenous drug</li>
        <li>- A sexual partner of any of the above</li>
        <li>- Last whole blood donation was 3 months ago</li>
        <li>- For female donors : not pregnant, last menstrual period was more than 3 days ago, and not breastfeeding</li></ul>

        <br/>
        <button><a href="{{ url()->previous() }}" class="btn btn-primary">Back</a></button>
    </div>
    </div></div>
</body>
</html>