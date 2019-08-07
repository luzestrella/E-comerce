import { Injectable } from '@angular/core';
import { Product } from './product/product';
import { ProductDatasourceService } from './product-datasource.service';

@Injectable({
  providedIn: 'root'
})
export class ProductRepositoryService {

  private products: Product[] = [];
  private categories: string[] = [];
  private scale: string[] = [];


  constructor(private dataSourceService: ProductDatasourceService) { 
    dataSourceService.getProducts().subscribe((response) => {
      this.products = response['products'];
      this.categories = response['products'].map(p => p.productLine)
                                            .filter((c, index, array) => array.indexOf(c) === index).sort();
      this.scale = response['products'].map(p => p.productScale)
                                            .filter((c, index, array) => array.indexOf(c) === index).sort();
    });
  }

  getProducts(productLine: string = null,productScale: string = null): Product[] {
    return this.products.filter((p) => (productLine == null || p.productLine === productLine)
                                    && (productScale == null || p.productScale === productScale));
   

  };
 
  getCategories(): string[] {
    return this.categories;
  }
  getProductsScale(productScale: string = null): Product[] {
    return this.products.filter((p) => productScale == null || p.productScale === productScale);
  };
  
  getScales(): string[] {
    return this.scale;
  }

}
