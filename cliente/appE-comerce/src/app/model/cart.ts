
import{Injectable} from '@angular/core';
import{ Product }  from './product/product';


@Injectable()
// Clase Cart Inicia
export class Cart {
    private lines:CartLine[]=[];
    public itemCount=0;
    public cartPrice=0;
    

    addLine(product:Product,quantity:number=1){
        const line = this.lines.find(line=> line.product.productCode===product.productCode);
        if(line !==undefined){
       line.quantity += quantity;
        }else{
           this.lines.push(new CartLine(product,quantity));
        }
    this.recalculate();
    }

    recalculate(){
        this.itemCount=0;
        this.cartPrice=0;
        this.lines.forEach(l =>{
            this.itemCount +=l.quantity;
            this.cartPrice += (l.quantity * l.product.MSRP);
        })

    }
    
    mostar(){
        console.log(this.lines);
        return this.lines;
    }
     cambiarPrecio(product:Product,quantity:number=1){
        const line = this.lines.find(line=> line.product.productCode===product.productCode);
        if(line !=undefined){
       line.quantity = quantity;
        }
    this.recalculate();
     } 
     Eliminar(product:Product){
        const line = this.lines.findIndex(line=> line.product.productCode===product.productCode);
        if(line !=undefined){
          this.lines.splice(line, 1);
        }
    this.recalculate();
     } 
}

// Clase Cart Finaliza

// Clase CartLine Inicia
export class CartLine{
    constructor(public product: Product, public quantity: number){}
    get LineTotal(){
        return this.quantity *this.product.MSRP;
  
    }
    
}
// Clase CarLine Finaliza
 