<!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-template-columns: 200px auto 200px;
  height:100%;
  width: 100%;
  background-image: url(modules/images/mountain_dark.svg);
  background-repeat: no-repeat;
  background-size: 200% 300%;
  background-position: calc(50% + 50px) 44%;
  grid-template-rows: auto  1fr  auto;

}
body{
  color: white;
  margin:0;
}
.grid-container > div {

  text-align: center;
  border-style: solid;
  border-width: 1px;
  font-size: 30px;
}
.item1{
  background-color: rgba(0, 0, 0, 0.8);
  grid-column: 1 / 4;
}
.item2{
    background-color: rgba(0, 0, 0, 0.6);
}
.item4{
    background-color: rgba(0, 0, 0, 0.6);
}

.item5{
    background-color: rgba(0, 0, 0, 0.8);
  height:50px;
  grid-column: 1 / 4;
}

/* hide side menus on phones */
@media screen and (max-width: 480px) {
    .grid-container {
      grid-template-columns: 0px auto 0px;
    }
    .item2{
      display: none;
    }
    .item4{
      display: none;
    }
}
</style>
</head>
<body>

<div class="grid-container">
  <div class="item1">header</div>
  <div class="item2">notification menu</div>
  <div class="item3">main</div>
  <div class="item4">analytics menu</div>
  <div class="item5">footer</div>
</div>

</body>
</html>
