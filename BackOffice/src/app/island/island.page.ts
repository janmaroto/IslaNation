import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { getStorage } from 'src/services/storage';
import { ApiService } from 'src/app/api.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-island',
  templateUrl: './island.page.html',
  styleUrls: ['./island.page.scss'],
})
export class IslandPage implements OnInit {
  island;
  mode;

  constructor(
    public  _apiService: ApiService,
    private route: ActivatedRoute,
    private router: Router

  ) {
    this.island = this.route.snapshot.paramMap.get("island");
    this.mode = this.route.snapshot.paramMap.get("mode");

    console.log(this.island);
    console.log(this.mode);

  }
  

  ngOnInit() {
  }

}
