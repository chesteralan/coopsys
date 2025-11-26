import { CivilStatus, Gender } from "@/typing/member";
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

export interface MemberResponse {
  member_id: string;
  message: string;
}

const API_BASE = "/members";

export const createMember = async (
  payload: CreateMemberPayload
): Promise<MemberResponse> => {
  const { data } = await axios.post<MemberResponse>(API_BASE, payload);
  return data;
};