package com.example.enotaris.notaris;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import com.example.enotaris.R;

import java.util.ArrayList;

public class ListAdapter extends BaseAdapter {
    private Context context;
    private ArrayList<ModelData> dataModelArrayList;
    public ListAdapter(Context context, ArrayList<ModelData>
            dataModelArrayList) {
        this.context = context;
        this.dataModelArrayList = dataModelArrayList;
    }
    @Override
    public int getViewTypeCount() {
        return getCount();
    }
    @Override
    public int getItemViewType(int position) {
        return position;
    }
    @Override
    public int getCount() {
        return dataModelArrayList.size();
    }
    @Override
    public Object getItem(int position) {
        return dataModelArrayList.get(position);
    }
    @Override
    public long getItemId(int position) {
        return 0;
    }
    @Override
    public View getView(int position, View convertView, ViewGroup
            parent) {ViewHolder holder;
        if (convertView == null) {
            holder = new ViewHolder();
            LayoutInflater inflater = (LayoutInflater) context
                    .getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            convertView = inflater.inflate(R.layout.pembayaran,
                    null, true);
            holder.tv_namaa = (TextView)
                    convertView.findViewById(R.id.tv_namaa);
            holder.tv_jenis = (TextView)
                    convertView.findViewById(R.id.tv_jenis);
            holder.tv_status = (TextView)
                    convertView.findViewById(R.id.tv_status);
                    convertView.setTag(holder);
        }else {
// the getTag returns the viewHolder object set as a tag to the view
            holder = (ViewHolder)convertView.getTag();
        }
        holder.tv_namaa.setText("Nama: "+dataModelArrayList.get(position).getNama());
        holder.tv_jenis.setText("Jenis: "+dataModelArrayList.get(position).getJenis());
        holder.tv_status.setText("Status: "+dataModelArrayList.get(position).getStatus());
        return convertView;
    }
    private class ViewHolder {
        protected TextView tv_namaa, tv_jenis, tv_status;

    }
}
