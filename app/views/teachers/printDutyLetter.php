<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print Letter</title>
  <style>
    @media print {
      body * {
        visibility: hidden;
      }

      #print-content,
      #print-content * {
        visibility: visible;
      }

      #print-content {
        position: absolute;
        top: 0;
        left: 0;
      }
    }
  </style>
</head>

<body>
  <div id="print-content" class="print">
    <div>
      Lorem ipsum dolor sit amet,
      consectetur adipisicing elit.
      Ab reiciendis doloribus consectetur optio doloremque,
      porro dolores at ratione,
      animi laboriosam,
      error aliquam perspiciatis explicabo consequatur id natus eos eum velit.
      Lorem ipsum dolor sit amet consectetur adipisicing elit.
      Dolorum earum iusto suscipit soluta quasi nam repellat fugiat architecto id,
      minima vero laborum optio quibusdam excepturi facere,
      voluptatem tenetur.
      Qui, corporis!
    </div>
    <div align="right">
      <div style="justify-content: center; width: auto"><?php echo $data['college']; ?></div>
      <div style="justify-content: center; width: auto"><?php echo $data['teacher']->name; ?></div>
    </div>
  </div>
  <div align="center">
    <button onclick="window.print()">Print</button>
  </div>
</body>

</html>