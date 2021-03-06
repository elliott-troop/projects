package com.example.eporterjr.sunshine;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

import com.example.eporterjr.sunshine.ui.main.ForecastFragment;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main_activity);
        if (savedInstanceState == null) {
            getSupportFragmentManager().beginTransaction()
                    .replace(R.id.container, ForecastFragment.newInstance())
                    .commitNow();
        }
    }
}
