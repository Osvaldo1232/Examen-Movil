import { ComponentFixture, TestBed } from '@angular/core/testing';
import { FabricantesPage } from './fabricantes.page';

describe('FabricantesPage', () => {
  let component: FabricantesPage;
  let fixture: ComponentFixture<FabricantesPage>;

  beforeEach(() => {
    fixture = TestBed.createComponent(FabricantesPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
