import { ComponentFixture, TestBed } from '@angular/core/testing';
import { PrecioAsusPage } from './precio-asus.page';

describe('PrecioAsusPage', () => {
  let component: PrecioAsusPage;
  let fixture: ComponentFixture<PrecioAsusPage>;

  beforeEach(() => {
    fixture = TestBed.createComponent(PrecioAsusPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
