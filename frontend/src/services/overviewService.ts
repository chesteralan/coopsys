import { ApiResponse } from "@/typing/member";
import axios from "@/config/axios";

export interface Overview {
  total_members: number;
  active_members: number;
  inactive_members: number;
}

const API_BASE = "/overview";

export const getOverview = async (): Promise<ApiResponse<Overview>> => {
  const { data } = await axios.get<ApiResponse<Overview>>(API_BASE);
  return data;
};
