<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../Views/css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <nav>
        <div class="logo">
            <img src="../Views/img/logo.png" alt="">
        </div>
    </nav>

    <div class="container">

        <div class="table-responsive">
            <form action="./all" method="POST">
                <div class="search-container">
                    <div class="input-fields">
                        <div class="search-div">
                            <input type="text" placeholder="id" id="id" name="id">
                            <i class="fas fa-key"></i>
                        </div>

                        <div class="search-div">
                            <input type="text" placeholder="email" name="email">
                            <i class="fas fa-envelope"></i>
                        </div>

                        <div class="search-div">
                            <input type="date" name="date">
                            <i class="fas fa-calendar-alt"></i>
                        </div>

                        <div class="search-div">
                            <input type="submit" value="Търси" name="go">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>

            </form>


            </div>

            <table class="table table-bordered table-condensed table-striped table-hover table-mc-light-blue">

                <tr>
                
                    <th>
                        Id
                    </th>
                    <th>
                        Тип
                    </th>
                    <th>
                        Купувач
                    </th>
                    <th>
                        email
                    </th>
                    <th>
                        Дата на посещение
                    </th>
                    <th>
                        Час на посещение
                    </th>
                    <th>
                        Закупен на
                    </th>
                
                </tr>

                <?php foreach ($this->tickets as $ticket):?>
                <tr>
                    <td>
                        <?= $ticket->getId(); ?>
                    </td>
                    <td>
                        <?= $ticket->getType(); ?>
                    </td>
                    <td>
                        <?= $ticket->getBuyer(); ?>
                    </td>
                    <td>
                        <?= $ticket->getEmail(); ?>
                    </td>
                    <td>
                        <?= $ticket->getDateVisit(); ?>
                    </td>
                    <td>
                        <?= $ticket->getTimeVisit(); ?>
                    </td>
                    <td>
                        <?= $ticket->getDateBought(); ?>
                    </td>

                </tr>

                <?php endforeach; ?>


            </table>
        </div>

    </div>