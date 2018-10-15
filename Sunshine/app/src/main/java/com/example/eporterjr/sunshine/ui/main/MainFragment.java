package com.example.eporterjr.sunshine.ui.main;

import android.arch.lifecycle.ViewModelProviders;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

import com.example.eporterjr.sunshine.R;

public class MainFragment extends Fragment {

    private MainViewModel mViewModel;
    private ArrayAdapter<String> mForecastAdapter;

    public static MainFragment newInstance() {
        return new MainFragment();
    }

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container,
                             @Nullable Bundle savedInstanceState) {

        View rootView = inflater.inflate(R.layout.main_fragment, container, false);
        String[] forecastArray = {
                "Today - Sunny - 88/63",
                "Tomorrow - Sunny - 88/63",
                "Wednesday - Sunny - 88/63",
                "Thursday - Sunny - 88/63",
                "Friday - Sunny - 88/63",
                "Saturday - Sunny - 88/63",
                "Sunday - Sunny - 88/63"
        };

        List<String> weekForecast = new ArrayList<>(Arrays.asList(forecastArray));

        mForecastAdapter = new ArrayAdapter<>(getActivity(), R.layout.list_item_forecast, R.id.list_item_forecast_textView, weekForecast);

        ListView listView = rootView.findViewById(R.id.listview_forecast);
        listView.setAdapter(mForecastAdapter);

        return rootView;
        //return inflater.inflate(R.layout.main_fragment, container, false);
    }

    @Override
    public void onActivityCreated(@Nullable Bundle savedInstanceState) {
        super.onActivityCreated(savedInstanceState);
        mViewModel = ViewModelProviders.of(this).get(MainViewModel.class);
        // TODO: Use the ViewModel
    }

}
