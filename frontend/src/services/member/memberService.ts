import {
  ApiResponse,
  CivilStatus,
  CreateMemberResponse,
  Gender,
  MemberItem,
  MembersResponse,
  MemberStatus,
} from "@/typing/member";
import axios from "@/config/axios";

export interface CreateMemberPayload {
  first_name: string;
  last_name: string;
  middle_name?: string;
  date_of_birth: string;
  place_of_birth: string;
  religion: string;
  gender: Gender;
  civil_status: CivilStatus;
}

const API_BASE = "/members";

export const createMember = async (
  payload: CreateMemberPayload,
): Promise<ApiResponse<CreateMemberResponse>> => {
  const { data } = await axios.post<ApiResponse<CreateMemberResponse>>(
    API_BASE,
    payload,
  );
  return data;
};

export const getMembers = async (
  status: MemberStatus,
): Promise<ApiResponse<MembersResponse>> => {
  const { data } = await axios.get<ApiResponse<MembersResponse>>(
    `${API_BASE}?status=${status}`,
  );
  return data;
};

export const getMemberData = async (
  id: string,
): Promise<ApiResponse<MemberItem>> => {
  const { data } = await axios.get<ApiResponse<MemberItem>>(
    `${API_BASE}/${id}`,
  );
  return data;
};

export const updateMember = async (
  member_id: string,
  payload: CreateMemberPayload,
): Promise<ApiResponse<CreateMemberResponse>> => {
  const { data } = await axios.put<ApiResponse<CreateMemberResponse>>(
    `${API_BASE}/${member_id}`,
    payload,
  );
  return data;
};
