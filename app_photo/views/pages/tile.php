<section class="grid-parent">
    <article class="grid-child">
        
          <img src="images/appareil.png" alt="" height="300px" width="300px" />
          <h3>nom appareil</h3>
          <h4>description</h4>
          <p>prix</p>
    </article>
  
 </section>>
    
 
<!-- SCSS tuile


 @mixin basic-styles {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: teal;
    color: white;
    font-family: Arial;
    font-size: 48px;
    font-weight: bold;
  }
  
  @mixin display-grid {
    display: -ms-grid;
    display: grid;
  }
  
  @mixin grid-child ($col-start, $col-end, $row-start, $row-end) {
    -ms-grid-column: $col-start;
    -ms-grid-column-span: $col-end - $col-start;
    -ms-grid-row: $row-start;
    -ms-grid-row-span: $row-end - $row-start;
    grid-column: #{$col-start}/#{$col-end};
    grid-row: #{$row-start}/#{$row-end};
  }
  
  .grid-parent {
    @include display-grid;
    -ms-grid-columns: 1fr 1fr 1fr;
    -ms-grid-rows: 100px 100px;
    grid-template-columns: repeat(3, 1fr);
    grid-auto-rows: 100px;
    border: 10px solid tomato;
    padding: 10px;
  }
  
  .grid-child {
    @include basic-styles;
  }
  
  .grid-child {
    &:not(:nth-child(n+4)) {
      margin-bottom: 10px;
    } 
  
    &:not(:nth-child(3n)) {
      margin-right: 10px;
    }
  }
  
  @supports (display: grid) {
    .grid-child {
      grid-gap: 10px;
      margin-right: 0;
      margin-bottom: 0;
    }
  } -->