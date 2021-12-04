<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <span style="font-size:13px;font-weight:bold;text-transform:uppercase;
">{{ $details['title'] }}</span><br/>
<span style="font-size:13px;
text-transform:uppercase;">Adresse:<span style="font-weight:bold;">{{ $details['labo'] }}</span> <br/>
<i class="fa fa-phone"></i> Contact : <span style="font-weight:bold;"> {{ $details['tel'] }}</span></span>

   <p  style="font-size:13px;
">Bonjour <span style="font-weight:bold;text-transform:uppercase;">{{ $details['patient'] }},</span><br/><br/>
 votre rendez-vous de désiptage COVID-19 <span style="font-weight:bold;text-transform:uppercase;">{{ $details['body'] }}</span> est confirmé.<br/><br/>
A très bientôt pour votre test.<br/><br/>
Cordialement.</p>
</body>
</html>
