import { Component, OnInit } from '@angular/core';
import { ProductRepositoryService } from '../model/product-repository.service';
import { Product } from '../model/product/product';
import {  Cart } from '../model/cart';


@Component({
  selector: 'app-store',
  templateUrl: './store.component.html',
  styleUrls: ['./store.component.css']
})
export class StoreComponent implements OnInit {

  public selectedCategory = null;
  public selectedScale = null;
  public productsPerPage = 12;
  public selectedPage = 1;
  constructor(private productRepoService: ProductRepositoryService, private cart: Cart) { }

  ngOnInit() {
    
  }

  get products(): Product[] {
    const pageIndex = (this.selectedPage - 1) * this.productsPerPage;
    return this.productRepoService.getProducts(this.selectedCategory, this.selectedScale)
    .slice(pageIndex,pageIndex + this.productsPerPage);
  };

  get categories(): string[] {
    return this.productRepoService.getCategories();
  };

  changeCategory(newCategory?: string) {
    this.selectedCategory = newCategory;
  };


  get productsScale(): Product[] {
    const pageIndex = (this.selectedPage - 1) * this.productsPerPage;
    return this.productRepoService.getProductsScale(this.selectedScale)
    .slice(pageIndex,pageIndex + this.productsPerPage);
  };

  get scales(): string[] {
    return this.productRepoService.getScales();
  };
  changeScale(newScale?: string) {
    this.selectedScale = newScale;
  };
  
  
  get pageNumbers(): number[] {
    return Array(Math.ceil(this.productRepoService.getProducts(this.selectedCategory, this.selectedScale).length / this.productsPerPage))
    .fill(0).map((x, i) => i + 1);
  };

 
  changePage(newNumber: number) {
    this.selectedPage = newNumber;
  }
  changePageSize(newSize:number){
    this.productsPerPage=newSize;
    this.changePage(1);
  }
  agregar(product:Product){
     this.cart.addLine(product);
  }
}
