<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            box-sizing: border-box;
        }

        ul {
            list-style-type: none;
        }

        body {
            font-family: "Lato", sans-serif;
        }

        * {
            margin: 0;
            box-sizing: border-box;
        }

        .wrapper {
            background-color: #dfe6e9;
            width: 100vw;
            height: 100vh;
            display: flex;
        }

        .calendar {
            margin: auto;
            width: 460px;
            background-color: #fff;
            box-shadow: 0px 0px 15px 4px rgba(0, 0, 0, 0.2);

        }



        .days {
                   font-weight: 300;
                   padding: 10px 0;
                   display: flex;
                   flex-wrap: wrap;
               }

               .days div {
                           text-align: center;
                           width: 14.28%;
                       }

                       .days div {
                           padding: 10px 0;
                           margin-bottom: 10px;
                           transition: all 0.4s;
                       }



        .prev {
          display: flex;
          justify-content: center;
          align-items: center;
          width: 30px;
          height: 30px;
          border-radius: 50%;
          font-size: 23px;
          background-color: rgba(0, 0, 0, 0.1);
          top:28px;
          position: relative;
          margin-left:10px;

        }
        .next {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            font-size: 23px;
            background-color: rgba(0, 0, 0, 0.1);
            top:-29px;
            position: relative;
            margin-left:420px;
        }

        .prev:hover,
        .next:hover {
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.2);

        }


    </style>
</head>

<body onload="renderDate()">

        <div class="calendar">
            <div >
                <div class="prev" onclick="moveDate('prev')"  id="prev" >
                    <span >&#10094;</span>
                </div>
                <div id="day" style="text-align:center">

                </div>
                <div class="next" onclick="moveDate('next')">
                    <span>&#10095;</span>
                </div>
            </div>
            <div class="days">
              <div>hhh</div>
                        </div>

        </div>
        <div class="calendar">
            <div >
                <div class="prev" onclick="moveDate('prev')"  id="prev" >
                    <span >&#10094;</span>
                </div>
                <div id="day" style="text-align:center">
                     <p></p>
                </div>
                <div class="next" onclick="moveDate('next')">
                    <span>&#10095;</span>
                </div>
            </div>
            <div class="days">
              <div>hhh</div>
                        </div>

        </div>
    <script>
        var dt = new Date();
        function renderDate() {
          
                  document.getElementById("day").innerHTML = "<div style='display:inline-block;padding-left:5px;font-size:11px'>" + dt.toLocaleString('fr-FR',{
                        weekday:'long',

                })+"<br/>"+dt.toLocaleString('fr-FR',{

                  month:'long',
                  day:'numeric'

                })+"</div>";




          for(i=1;i<6;i++) {

            dt.setDate(dt.getDate() + 1);
      document.getElementById("day").innerHTML += "<div style='display:inline-block;padding-left:20px;font-size:11px'>" + dt.toLocaleString('fr-FR',{
                  weekday:'long',

          })+"<br/>"+dt.toLocaleString('fr-FR',{

            month:'long',
            day:'numeric'

          })+"</div>";

          }


        }

        function moveDate(para) {
           if(para == 'next') {

                dt.setDate(dt.getDate() + 1);
                  renderDate();
            } else if(para == 'prev') {
              dt.setDate(dt.getDate() -11);

              renderDate();


}


        }



    </script>
</body>

</html>
