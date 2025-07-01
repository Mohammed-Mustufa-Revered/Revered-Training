<!DOCTYPE html>
<html>
 
<head>
    <title>Chess Board</title>
    <style>
        .chess-board {
            width: 640px;
            height: 640px;
            border: 4px solid #333;
            display: grid;
            grid-template-columns: repeat(8, 1fr);
        }
 
        .white {
            background-color: #fff;
            width: 80px;
            height: 80px;
        }
 
        .black {
            background-color: #000;
            width: 80px;
            height: 80px;
        }
    </style>
</head>
 
<body>
     </body>
 
</html>
 
    <?php
 
    class ChessBoard
    {
 
        private $rows;
        private $cols;
 
        public function __construct($rows = 8, $cols = 8)
        {
            $this->rows = $rows;
            $this->cols = $cols;
        }
 
        public function draw()
        {
            echo '<div class="chess-board">';
            for ($row = 1; $row <= $this->rows; $row++) {
                for ($col = 1; $col <= $this->cols; $col++) {
                    $isBlack = ($row + $col) % 2 == 0;
                    $colorClass = $isBlack ? 'black' : 'white';
                    echo "<div class='$colorClass'></div>";
                }
            }
            echo '</div>';
        }
    }
 
    $board = new ChessBoard();
    $board->draw();

    ?>
 
